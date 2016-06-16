// USER SERVICE
function userService($http) {
    return {
        get : function() {
            return $http.get('app_dev.php/api/user/users.json');
        },
        update : function(id, data){
            delete data.id;
            return $http.put('app_dev.php/api/user/edit/' + id + '.json', data);
        },
        create : function(data) {
            return $http.post('app_dev.php/api/user/new.json', data);
        },
        delete : function(id) {
            return $http.delete('app_dev.php/api/user/delete/' + id + '.json');
        }
    }
};
