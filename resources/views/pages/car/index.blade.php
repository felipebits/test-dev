@extends('layouts.app')
@section('css')
@stop

@section('content')
    <div class="container">
        <br/>
        <br/>
        <div ng-controller="CarController as vm">
            @include('pages.partials.add')
            <section id="no-data" ng-if="vm.carList.length <= 0">
                <div class="alert alert-danger">
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                    No Data
                </div>
            </section>
            <section id="data" ng-if="vm.carList.length > 0">
                <div class="panel " ng-class="{'panel-primary': vm.edit[i], 'panel-success': !vm.edit[i]}" ng-repeat="(i, list) in vm.carList" ng-if="vm.carList.length > 0">
                    @include('pages.partials.list')
                    @include('pages.partials.edit')
                    
                </div>
            </section>
        </div>
    </div>
@stop


@section('javascript-bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.6.5/angular-messages.min.js"></script>
    <script>

        angular.module("app", ['ngMessages'])
                .controller("CarController", ['CarFactory', 'MarcaFactory', function(CarFactory, MarcaFactory) {
                    var vm = this;
                    vm.carList = [];
                    vm.marcaList = [];
                    vm.edit = [];
                    vm.params = {};
                    vm.addCar = function(isFormValid){
                        if(isFormValid){
                            CarFactory.insert(vm.params).then(function(result){
                                var d = result.data;
                                if(d.success)
                                    vm.showCars();
                            });
                        }

                    };
                    vm.editCar = function(id, i, params){
                        if(vm.edit[i]){
                            CarFactory.edit(id, params).then(function(result){
                                var d = result.data;
                                if(d.success)
                                    vm.showCars();
                            });
                        }
                    };
                    vm.showCars = function(){
                        CarFactory.showAll().then(function(result){
                            var d = result.data;
                            if(d.length > 0) {
                                vm.carList = d;
                            }
                        });
                    };

                    vm.deleteCar = function(id){
                        CarFactory.delete(id).then(function(result){
                            var d = result.data;
                            if(d.success)
                                vm.showCars();
                        });
                    };
                    vm.showMarcas = function(){
                        MarcaFactory.getMarcas().then(function(result){
                            var d = result.data;
                            if(d.length > 0){
                                vm.marcaList = d;
                            }
                        });
                    };
                    vm.showCars();
                    vm.showMarcas();

                }])
                .factory('MarcaFactory', function($http){
                    var MarcaFactory = {};
                    var url = 'api/marcas/';
                    MarcaFactory.getMarcas = function(){
                        return $http.get(url);
                    };
                    return MarcaFactory;
                })
                .factory('CarFactory', function($http){
                    var CarFactory = {};
                    var url = 'api/carros/';

                    CarFactory.showAll = function(){
                        return $http.get(url);
                    };
                    CarFactory.insert = function(params){
                        return $http.post(url, params);
                    };
                    CarFactory.delete = function(id){
                        return $http.delete(url + id);
                    };
                    CarFactory.edit = function(id, params){
                        return $http.put(url + id, params);
                    };
                    return CarFactory;
                })
                .directive('carroMarca', function(){
                            return {
                                restrict: 'E',
                                scope: {
                                    ngModel: '=',
                                    marcaList: '=data'
                                },
                                template: '<select ng-model="ngModel" class="form-control" required>'+
                                '<option value="">Select a Brand</option>'+
                                '<option value="@{{ marca.id }}" ng-repeat="marca in marcaList"> @{{ marca.name }}</option>'+
                                '</select>'
                            }
                        })
                .directive('validationForm', function(){
                    return {
                        template: `
                        <div class="errors">
                            <div ng-messages="carForm.name.$error">
                                <p ng-message="minlength" class="alert alert-danger">
                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                    Name must be at least 6 characters.
                                </p>
                            </div>
                            <div ng-messages="carForm.ano.$error">
                                <p ng-message="number" class="alert alert-danger">
                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                    Just number
                                </p>
                                <p ng-message="minlength" class="alert alert-danger">
                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                    Year must be at least 4 characters.
                                </p>
                                <p ng-message="maxlength" class="alert alert-danger">
                                    <i class="fa fa-bell-o" aria-hidden="true"></i>Year must be a maximum of 4 characters.
                                </p>
                            </div>
                        </div>
                        `
                    }
                });
    </script>
@stop