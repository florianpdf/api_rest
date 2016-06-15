// USER SERVICE
function userService($http) {
    return {
        get : function() {
            return $http.get('/fullapirest/web/app_dev.php/api/user/users.json');
        },
        update : function(id, data){
            return $http.put('users' + id, data);
        },
        create : function(data) {
            return $http.post('/fullapirest/web/app_dev.php/api/user/new.json', data);
        },
        delete : function(id) {
            return $http.delete('' + id);
        }
    }
};
