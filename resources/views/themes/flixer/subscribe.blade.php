@extends('themes.flixer.layout.app')

@section('title', 'Register')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" onclick="hideSearch();" id="app">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-5 centered pricing-page">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center"> Subscribe</h3></div>
                        <div class="panel-body text-center">
                            <p class="lead" style="font-size:40px">
                                <strong>
                                    25 nolly<span>/month</span>
                                </strong>

                            </p>
                            <p>
                                Transfer the plan fee to the account in nolly to following address.
                            </p>
                            <span class="label label-primary"> {{ $address }}</span>
                            <p>Click the button bellow to verify subscription</p>
                        </div>

                        <div class="panel-footer">
                            <a class="btn btn-danger btn-block btn-fill" data-toggle="modal" data-target="#pay">Verify and Subscribe</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content payment-modal">
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>



    <script>
        var app = new Vue({
            el: '#app',
            mounted: function () {
                if (typeof web3 !== 'undefined') {
                    web3 = new Web3(web3.currentProvider);
                } else {
                    // set the provider you want from Web3.providers
                    web3 = new Web3(new Web3.providers.HttpProvider("http://127.0.0.1:7545"));
                }


//            web3.eth.getAccounts(function(error, accounts) {
//                if (error) {
//
//                    console.log(error);
//                }
//
//                var account = accounts[0];
//                that.getBalance(account)
//
//            })
            },
            data: {
                balance: 23434,
                user: {},
                loading: false
            },
            methods: {
                showAddress: function(){

                    this.showSubscribe = true;
                    alert("Show address")

                },
                registerUser: function (e) {
                    e.preventDefault();

                    var that = this;
                    that.loading = true;
                    axios.post('/userController.php', {
                        full_name: this.user.full_name,
                        email: this.user.email,
                        password: this.user.password,
                        phone: this.user.phone
                    }).then(function (resp) {

                        if(resp.data = 'successs'){
                            that.loading = false
                            that.showAddress()
                            console.log(resp.data);
                        }

                    }).catch(function (error) {

                    })

                }

            }
        })

    </script>
@endsection
