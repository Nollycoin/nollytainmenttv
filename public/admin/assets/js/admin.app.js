function deletePage(id) {
    if (confirm('Are you sure you want to delete this page?')) {
        $.get('/page/' + id + '/delete', function (data) {
            if (data) {
                alert('Page deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting page');
            }
        });
    }

    return false;
}

function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user?')) {
        $.get('admin/user/' + id + '/delete', function (data) {
            if (data) {
                alert('User deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting user');
            }
        });
    }
    return false;
}

function deleteCode(id) {
    if (confirm('Are you sure you want to delete this code?')) {
        $.get('/admin/code/' + id + '/delete', function (data) {
            if (data) {
                alert('Code deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting code');
            }
        });
    }
    return false;
}

function deleteCategory(id) {
    if (confirm('Are you sure you want to delete this category?')) {
        $.get('/admin/genre/' + id + '/delete', function (data) {
            if (data) {
                alert('Category deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting category');
            }
        });
    }
    return false;
}

function deleteActor(id) {
    if (confirm('Are you sure you want to delete this actor?')) {
        $.get('/actor/' + id + '/delete', function (data) {
            if (data) {
                alert('Actor deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting actor');
            }
        });
    }
    return false;
}

function deleteVideo(id) {
    if (confirm('Are you sure you want to delete this video?')) {
        $.get('/video/' + id + '/delete', function (data) {
            if (data) {
                alert('Video was deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting video');
            }
        });
    }
    return false;
}

function deleteEpisode(id) {
    if (confirm('Are you sure you want to delete this episode?')) {
        $.get('/admin/episode/' + id + '/delete', function (data) {
            if (data) {
                alert('Episode was deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting episode');
            }
        });
    }
    return false;
}

function deletePartner(id) {
    if (confirm('Are you sure you want to delete this Partner')) {
        $.get('/publisher/partner/' + id + '/delete', function (data) {
            if (data) {
                alert('Partner was deleted successfully');
                window.location.reload();
            } else {
                alert('An error occurred while deleting Partner');
            }
        });
    }
    return false;
}


/*functions below are used by publisher*/

function getUnallocatedPercentage(movie_id) {
    $.get('/publisher/movie/' + movie_id + '/unallocated_percentage', function (data) {
        if (data) {
            data = JSON.parse(data);
            $('#available_percentage').html(data.unallocatedPercentage);
            $('#movieName').html(data.movieName);
        }
    });
}

function addActorFromExisting(id) {
    if (confirm('Add this actor to your collection?')) {
        $.get('/publisher/actor/' + id + '/add_from_existing', function (data) {
            if (data) {
                alert('Actor added to your collection successfully');
                $('#actor-'+id).remove();
            }
            else {
                alert('An error occurred while adding this actor to your collection');
            }
        });
    }
}