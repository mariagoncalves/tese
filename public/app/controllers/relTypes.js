app.controller('RelationTypesManagmentControllerJs', function($scope, $http, growl, API_URL) {

    $scope.relations = [];
    $scope.entities = [];
    $scope.transactionTypes = [];
    $scope.transactionStates = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];
    $scope.errors = [];

    $scope.getRelations = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }

        $http.get('/relTypes/get_relations?page='+pageNumber).then(function(response) {
            console.log(response);
            $scope.relations = response.data.data;

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

    $scope.toggle = function(modalstate, id) {
        /*$('#formProperty')[0].reset();
        $scope.property = null;
        $scope.modalstate = modalstate;

        if(modalstate == "edit") {
            $('#myModal select:first').prop('disabled', true);
        } else {
            $('#myModal select:first').prop('disabled', false);
        }*/

        switch (modalstate) {
            case 'add':
                $scope.id = id;
                $scope.form_title = "Add New Relation Type";
                break;
            case 'edit':
                $scope.form_title = "Edit Relation Type";
                $scope.id = id;
                $http.get(API_URL + '/properties/get_property/' + id)
                    .then(function(response) {
                        $scope.property = response.data;
                    });
                break;
            default:
                break;
        }
        $('#myModal').modal('show');
        $scope.errors = null;
        $scope.process = null;
    };

    $scope.save = function(modalstate, id) {
        var url      = API_URL + "Relation";


        console.log(jQuery('#formRelation').serializeArray());

        var formData = JSON.parse(JSON.stringify(jQuery('#formRelation').serializeArray()));

        console.log(formData);

        if (modalstate === 'edit') {
            url += "/" + id ;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param(formData),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            //First function handles success
            $scope.errors = [];
            $scope.getRelations();
            $('#myModal').modal('hide');

            $('#myModal select:first').prop('disabled', false);
            $('#formRelation')[0].reset();


            if(modalstate == "add") {
                growl.success('Relation inserted successfully.',{title: 'Success!'});
            } else {
                growl.success('Relation edited successfully.',{title: 'Success!'});
            }
        }, function(response) {
            //Second function handles error
            if (response.status == 400) {
                $scope.errors = response.data.error;
            } else if (response.status == 500) {


                $('#myModal').modal('hide');
                $('#formRelation')[0].reset();


                growl.error(response.data.error, {title: 'error!'});
            }
        });
    };

    $scope.getStates = function() {
        //Estado das propriedades
        $http.get('/properties/states').then(function(response) {
            $scope.states = response.data;
            console.log($scope.states);
        });
    };

    $scope.getEntities = function() {
        $http.get('/getAllEntities').then(function(response) {
            $scope.entities = response.data;
            console.log($scope.entities);
        });
    };

    $scope.getTransactionsTypes = function() {
        $http.get('/getAllTransactionTypes').then(function(response) {
            $scope.transactionTypes = response.data;
            console.log($scope.transactionTypes);
        });
    };

    $scope.getTransactionsStates = function() {
        $http.get('/getAllTransactionStates').then(function(response) {
            $scope.transactionStates = response.data;
            console.log($scope.transactionStates);
        });
    };

}).directive('pagination', function(){
    return{
        restrict: 'E',
        template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getEntities(1)">&laquo;</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getEntities(currentPage-1)">&lsaquo; Prev</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
        '<a href="javascript:void(0)" ng-click="getEntities(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getEntities(currentPage+1)">Next &rsaquo;</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getEntities(totalPages)">&raquo;</a></li>'+
        '</ul>'
    };
});

