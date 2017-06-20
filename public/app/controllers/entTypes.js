/**
 * Created by ASUS on 26/05/2017.
 */
app.controller('entityTypesController', function($scope, $http, growl, API_URL) {
    $scope.langs = function() {
        $http.get(API_URL + "/proc_types/get_langs")
            .then(function (response) {
                $scope.langs = response.data;
            });
    };

    $scope.transacstypes = function() {
        $http.get(API_URL + "/ents_types/get_transacs_types")
            .then(function (response) {
                $scope.transactiontypes = response.data;
            });
    };

    $scope.tstates = function() {
        $http.get(API_URL + "/ents_types/get_tstates")
            .then(function (response) {
                $scope.tstates = response.data;
            });
    };

    $scope.enttypes = function() {
        $http.get(API_URL + "/ents_types/get_enttypes")
            .then(function (response) {
                $scope.enttypes = response.data;
            });
    };


    $scope.processtypes = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];

    $scope.getEntityTypes = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        //Process_Type
        $http.get('/ents_types/get_ents_types?page='+pageNumber).then(function(response) {
            $scope.entitytypes = response.data.data; //quando é procurado do processtypes para a linguagem
            //$scope.processtypes = response.data.data[0].process_type; quando é procurado da linguagem para o processtypes
            //alert(response.data.data[0].language[0].pivot.name);
            $scope.totalPages = response.data.last_page;
            $scope.currentPage = response.data.current_page;

            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.data.last_page; i++) {
                pages.push(i);
            }

            $scope.range = pages;

        });
    };

    $scope.transacstypes();
    $scope.langs();
    $scope.tstates();
    $scope.enttypes();
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.id = id;
                $scope.form_title = "Adicionar Novo Tipo de Transacção";
                break;
            case 'edit':
                $scope.form_title = "Detalhes do Tipo de Transacção";
                $scope.id = id;
                $http.get(API_URL + 'ents_types/get_ents_types/' + id)
                    .then(function(response) {
                        $scope.entitytype = response.data;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
        $scope.errors = null;
        $scope.process = null;
    };


    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "Entity_Type";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param({ 'language_id' : $scope.entitytype.language[0].id,
                'name': $scope.entitytype.language[0].pivot.name,
                'state': $scope.entitytype.state,
                'transaction_type_id': $scope.entitytype.transaction_type_id,
                'ent_type_id': $scope.entitytype.ent_type_id,
                't_state_id' : $scope.entitytype.t_state_id
                }
                ),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            //headers: {'Content-Type': 'json'}
        }).then(function (response) {
            growl.success('This is success message.',{title: 'Success!'});
            $('#myModal').modal('hide');
            $scope.getEntityTypes();
        }, function errorCallback(response) {
            if (response.status == 400)
            {
                growl.error('This is error message.',{title: 'error!'});
            }
            else
            {
                $scope.errors = response.data;
            }
            //console.log(response);
        });
    };
}).directive('postsPagination', function(){
    return{
        restrict: 'E',
        template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getEntityTypes(1)">&laquo;</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getEntityTypes(currentPage-1)">&lsaquo; Prev</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
        '<a href="javascript:void(0)" ng-click="getEntityTypes(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getEntityTypes(currentPage+1)">Next &rsaquo;</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getEntityTypes(totalPages)">&raquo;</a></li>'+
        '</ul>'
    };
});