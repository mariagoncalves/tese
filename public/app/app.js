/**
 * Created by ASUS on 26/05/2017.
 */
var app = angular.module('umaeeteam', ['angular-growl', 'ui.sortable', 'smart-table'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
})
    .constant('API_URL','http://localhost:8000/');

app.config(['growlProvider', function (growlProvider) {
    growlProvider.globalTimeToLive({success: 3000, error: 2000, warning: 3000, info: 4000});
}]);
