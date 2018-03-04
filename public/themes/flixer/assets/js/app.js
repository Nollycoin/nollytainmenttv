
var app = new Vue({
    el: '#app',
    mounted: function () {
        var player_skin = {name: 'seven', active: '#DE1212', inactive: 'white', background: 'rgba(16, 16, 16, 1)'}
        var that = this;

        NProgress.done();
        $(".chosen").chosen({disable_search_threshold: 30});
        $(".chosen-results").mCustomScrollbar({theme: 'dark'});
        $("#phone").intlTelInput({utilsScript: base + '/assets/tel-input/js/utils.js'});
        $(".country-list").mCustomScrollbar({theme: 'dark-3'});
        $(':checkbox').checkbox();
        $(".movie-slider-1").owlCarousel({
            navigation: true,
            navigationText: [
                "<i class='ti-angle-left icon-white'></i>",
                "<i class='ti-angle-right icon-white'></i>"
            ],
            autoplay: true,
            items: 4,
            lazyLoad: true,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX'
        });
        if (user_id.length == 0) {
            var readonly = true;
        } else {
            var readonly = false;
        }
        $('.star-rating').rateYo({
            rating: that.getRating($('#movie_id').val()),
            halfStar: true,
            ratedFill: "#DE1212",
            normalFill: "#262626",
            readOnly: readonly,
            "starSvg": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/></svg>'
        })
            .on('rateyo.set', function (e, data) {
                var rating = data.rating;
                var movie_id = $('#movie_id').val();
                that.updateRating(movie_id, rating);
            });


        $('#phone').on('countrychange', function (e, countryData) {
            var phone = $('#phone').intlTelInput('getNumber');
            $('#phone_country_code').val(phone);
        });

        $(document).on('hidden.bs.modal', function (e) {
            jwplayer().stop();
            $('html').css('overflow-y', 'scroll');
        });
    },
    data: {
        message: 'Hello Vue!',
    }, methods: {

        loadSeason: function (season_id, season_number) {
    $.get(base + '/ajax/load_season.php?season_id=' + season_id + '&season_number=' + season_number,
        function (data) {
            $('.cast').hide();
            $('.suggestions').hide();
            $('.tabs li:nth-child(1)').addClass('active');
            $('.tabs li:nth-child(2)').removeClass('active');
            $('.tabs li:nth-child(3)').removeClass('active');
            $('.episodes').show();
            $('.season-picker').show();
            $('.episodes-ajax').html(data);
            $('.season-number').html('Season ' + season_number);
            $('#season-' + season_number).addClass('active');
        }
    );
},

        loadCast: function (movie_id) {
    $('.episodes').hide();
    $('.suggestions').hide();
    $('.season-picker').hide();
    if ($('.tabs li:nth-child(3)').length) {
        $('.tabs li:nth-child(1)').removeClass('active');
        $('.tabs li:nth-child(2)').addClass('active');
        $('.tabs li:nth-child(3)').removeClass('active');
    } else {
        $('.tabs li:nth-child(2)').removeClass('active');
        $('.tabs li:nth-child(1)').addClass('active');
    }
    $('.cast').show();
},


        loadSuggestions: function (movie_id) {
    $('.episodes').hide();
    $('.cast').hide();
    $('.season-picker').hide();
    if ($('.tabs li:nth-child(3)').length) {
        $('.tabs li:nth-child(2)').removeClass('active');
        $('.tabs li:nth-child(1)').removeClass('active');
        $('.tabs li:nth-child(3)').addClass('active');
    } else {
        $('.tabs li:nth-child(1)').removeClass('active');
        $('.tabs li:nth-child(2)').addClass('active');
    }
    $('.suggestions').show();
},

        loadEpisode: function (episode_id, is_embed) {
    $.get(base + '/ajax/load_episode.php?episode_id=' + episode_id + '&is_embed=' + is_embed,
        function (data) {
            if (is_embed == 0) {
                jwplayer().stop();
                var result = JSON.parse(data);
                var output = [];
                for (var i = 0; i < result.playlist.length; i++) {
                    var item = result.playlist[i];
                    output[i] = {};
                    output[i].file = uploads_path + '/' + item.episode_source;
                    output[i].image = uploads_path + '/poster_images/' + result.series_poster_image;
                    output[i].title = item.episode_name;
                    output[i].description = item.episode_description;
                }
                jwplayer().load(output);
                jwplayer().playlistItem(result.episode_index - 1);
            } else {
                $('.player-single-wrapper').html(data);
            }
        }
    );
},

        addToList: function (movie_id) {
    $.get('movie/'+movie_id+'/add_to_list', function (data) {
        $('.add-list').html(data);
    });
},

        initializePlayer: function (playlist) {
    var playerInstance = jwplayer('player');
    playerInstance.setup({
        "playlist": playlist,
        stretching: 'fill',
        height: '100%',
        width: '100%',
        abouttext: 'Flixer Player',
        repeat: false,
        autostart: false,
        displaytitle: false,
        displaydescription: false,
        skin: player_skin
    });
},

        isURL: function (str) {
    var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
    return pattern.test(str);
},

        cleanSource: function (source) {
    if (isURL(source) == true) {
        source = source;
    } else {
        source = uploads_path + '/' + source
    }
    return source;
},

        setPlayerSource: function (movie_id, is_series, is_embed) {
            var that = this;
    $.get(base + '/ajax/set_player_source.php?id=' + movie_id + '&is_series=' + is_series + '&is_embed=' + is_embed,
        function (data) {
            if (is_embed == 0) {
                if (is_series == 0) {
                    that.loadCast(movie_id);
                    var result = JSON.parse(data);
                    var output = {};
                    output.file = cleanSource(result[0].movie_source);
                    output.image = uploads_path + '/poster_images/' + result[0].movie_poster_image;
                    output.title = result[0].movie_name;
                    output.description = result[0].movie_plot;
                    initializePlayer(output);
                } else {
                    var result = JSON.parse(data);
                    var output = [];
                    for (var i = 0; i < result.playlist.length; i++) {
                        var item = result.playlist[i];
                        output[i] = {};
                        output[i].file = cleanSource(item.episode_source);
                        output[i].image = uploads_path + '/poster_images/' + result.series_poster_image;
                        output[i].title = item.episode_name;
                        output[i].description = item.episode_description;
                    }
                    initializePlayer(output);
                }
            } else {
                $('.player-single-wrapper').html(data);
            }
        }
    );
},

        updateRating: function (movie_id, rating) {
    $.get(base + '/movie/'+movie_id+'/rating/update/'+rating+'');
},

        getRating: function (movie_id) {
    $.get(base + '/movie/' + movie_id + '/rating', function (data) {
        $(".star-rating").rateYo("option", "rating", data);
    });
},

        changeFilter: function () {
    var filter = $('#filter').val();
    var no_filter_url = location.href.replace(/&?filter=([^&]$|[^&]*)/i, '');
    var no_filter_url = no_filter_url.replace('?', '');
    document.location = no_filter_url + '?filter=' + filter;
},

        showSearch: function() {
    var form = $('.navbar-form');
    var toggle = $('#search-toggle');
    form.fadeIn('fast');
    toggle.hide();
},

        hideSearch: function () {
    var form = $('.navbar-form');
    var toggle = $('#search-toggle');
    form.hide();
    toggle.show();
}

    }
})
