// USER SERVICE
function userService($http) {
    return {
        get : function() {
            return $http.get('api/user/users.json');
        },
        update : function(id, data){
            delete data.id;
            return $http.put('api/user/edit/' + id + '.json', data);
        },
        create : function(data) {
            return $http.post('api/user/new.json', data);
        },
        delete : function(id) {
            return $http.delete('api/user/delete/' + id + '.json');
        }
    }
};
