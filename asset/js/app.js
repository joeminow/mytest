var todoApp = angular.module('sellerApp', []);

todoApp.controller('TodoCtrl', function ($scope, $http) {
	
	$http.get('index.php/api/get_seller').success(function(data){
		$scope.seller = data;
	}).error(function(data){
		$scope.seller = data;
	});
	
	$scope.refresh = function(){
		$http.get('index.php/api/get_seller').success(function(data){
			$scope.seller = data;
		}).error(function(data){
			$scope.seller = data;
		});
	}
	$scope.get_seller_id = function(seller){
		var id={
				sel_id:seller.sel_id
				}
			$http.post('index.php/api/get_seller_id', id).success(function(data){
			$scope.seller_id = data;
			$scope.sellerName_edit = $scope.seller_id[0].sel_nam;
			$scope.sellerCategory_edit = $scope.seller_id[0].sel_cat;
			$scope.sellerAddress_edit = $scope.seller_id[0].sel_add;
			$scope.sellerPhone_edit = $scope.seller_id[0].sel_phn;
			$scope.sellerEmail_edit = $scope.seller_id[0].sel_eml;
		}).error(function(data){
			$scope.seller_id = data;
		});
	}

	$scope.addSeller = function(){
		var newTask = {
						sel_nam: $scope.sellerName,
						sel_cat: $scope.sellerCategory,
						sel_add: $scope.sellerAddress,
						sel_phn: $scope.sellerPhone,
						sel_eml: $scope.sellerEmail
						
					  };
		$http.post('index.php/api/add_seller', newTask).success(function(data){
			$('#myModal').modal('hide');
			$scope.refresh();
			
		}).error(function(data){
			alert(data.error);
		});
	}
	$scope.updateSeller = function(seller){
		
		var edit_value = {
						sel_id:  seller.sel_id,
						sel_nam: $('#name_edit').val(),
						sel_cat: $('#category_edit').val(),
						sel_add: $('#address_edit').val(),
						sel_phn: $('#phone_edit').val(),
						sel_eml: $('#email_edit').val()
						
					  };
		
		$http.post('index.php/api/update_seller', edit_value).success(function(data){
			$('#myModal_update').modal('hide');
			$scope.refresh();
			
		}).error(function(data){
			alert(data.error);
		});
	}
	
	$scope.deleteTask = function(seller){
		var id={

				sel_id:seller.sel_id
				}
		var x = confirm("Are you sure you want to delete?");
  		if (x)        
			$http.post('index.php/api/del_seller', id).success(function(data){
				$scope.refresh();
				
			}).error(function(data){
				alert(data.error);
			});
		else
	    return false;
		
	}
	
	$scope.updateTask = function(task){
		
	}
	
});