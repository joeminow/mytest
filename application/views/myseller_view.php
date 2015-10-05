<!DOCTYPE html>
<html lang="en" data-ng-app="sellerApp">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<meta name="description" content="Test ">
		<meta name="author" content="joe">
		<title>My Seller</title>

		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url('asset/css/bootstrap.min.css') ?>" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body data-ng-controller="TodoCtrl">

		<!-- Begin page content -->
		<div class="container">
	    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
           		<a class="navbar-brand" href="#">My Seller</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            
            <ul class="nav navbar-nav navbar-right">
             
              <li><a href="#"> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">New Seller</button></a></li>
              
            </ul>
                 
          </div>
        </div>
	        <div class="jumbotron">
	       
	        	<div class="table-responsive"> 
								
					  <table class="table">
					    <thead>
					      <tr>
					        <th>No</th>
					        <th>Name</th>
					        <th>Main Category</th>
					        <th>Address</th>
					        <th>Phone Number</th>
					        <th>Email</th>
					        <th colspan="2" align="center">Action</th>
					      </tr>
					    </thead>
					    <tbody>
						
							<tr ng-if="seller.length === 0">
								<td class="danger" colspan="8" align="center">No Data</td>
							</tr>
						
					        <tr ng-repeat="sel in seller" ng-if="seller.length > 0">
					        <td>{{$index + 1}}</td>
					        <td>{{sel.sel_nam}}</td>
					        <td>{{sel.sel_cat}}</td>
					        <td>{{sel.sel_add}}</td>
					        <td>{{sel.sel_phn}}</td>
					        <td>{{sel.sel_eml}}</td>
					        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_update" ng-click="get_seller_id(seller[$index])") >Edit</button></td>
					        <td><button type="button" class="btn btn-danger" ng-click="deleteTask(seller[$index])">Delete</button></td>
					      </tr>
					    </tbody>
					  </table>
					  </div>
			</div>
		</div>

		<!-- Insert pop up-->

			  <!-- Modal content-->
			  <div class="modal fade" id="myModal" role="dialog">
    			<div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Insert Seller Data</h4>
			        </div>
			        <div class="modal-body">
			          	 <form class="form-horizontal" role="form" ng-submit="addSeller()">			          	 
			          	 	 <div class="form-group">
							    <label class="control-label col-sm-2" for="name">Name:</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" name="name" ng-model="sellerName" placeholder="Enter Seller Name" required>
							    </div>
							  </div>
							   <div class="form-group">
							    <label class="control-label col-sm-2" for="category">Category:</label>
							    <div class="col-sm-10">
							     <input type="text" class="form-control" name="category" ng-model="sellerCategory" placeholder="Enter Seller Category" required>
							    </div>
							  </div>
							  	 <div class="form-group">
							    <label class="control-label col-sm-2" for="address">Address:</label>
							    <div class="col-sm-10">
							       <input type="text" class="form-control" name="address" ng-model="sellerAddress" placeholder="Enter Seller Adsress" required>
							    </div>
							  </div>
							  	 <div class="form-group">
							    <label class="control-label col-sm-2" for="phone">Phone Number:</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" name="phone" ng-model="sellerPhone" placeholder="Enter Seller Phone Number" required>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2" for="email">Email:</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" id="email" ng-model="sellerEmail" placeholder="Enter email">
							    </div>
							  </div>
							
							   <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-default">Submit</button>
							       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							    </div>
							  </div>
							</form>
			        </div>
			        <div class="modal-footer">
			         
			        </div>
			      </div>
				</div>
			   </div>


			   			  <!-- Modal content-->
			  <div class="modal fade" id="myModal_update" role="dialog">
    			<div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Update Seller Data</h4>
			        </div>
			        <div class="modal-body"  ng-repeat="seller in seller_id">
			          	 <form class="form-horizontal" role="form" ng-submit="updateSeller(seller_id[$index])">			          	 
			          	 	 <div class="form-group">
							    <label class="control-label col-sm-2" for="name">Name:</label>
							    <div class="col-sm-10">
								<input type="text"  class="form-control" id="name_edit" name="name_edit" ng-model="sellerName_edit" placeholder="Enter Seller Name"  required>
							    </div>
							  </div>
							   <div class="form-group">
							    <label class="control-label col-sm-2" for="category">Category:</label>
							    <div class="col-sm-10">
							     <input type="text" class="form-control" name="category_edit" id="category_edit"  ng-model="sellerCategory_edit"  placeholder="Enter Seller Category" required>
							    </div>
							  </div>
							  	 <div class="form-group">
							    <label class="control-label col-sm-2" for="address">Address:</label>
							    <div class="col-sm-10">
							       <input type="text" class="form-control" name="address_edit" id="address_edit"  ng-model="sellerAddress_edit"  placeholder="Enter Seller Adsress" required>
							    </div>
							  </div>
							  	 <div class="form-group">
							    <label class="control-label col-sm-2" for="phone">Phone Number:</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" name="phone_edit"  id="phone_edit"  ng-model="sellerPhone_edit"  placeholder="Enter Seller Phone Number" required>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-2" for="email">Email:</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" name="email_edit" id="email_edit"  ng-model="sellerEmail_edit"  placeholder="Enter email">
							    </div>
							  </div>
							
							   <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-default">Update</button>
							       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							    </div>
							  </div>
							</form>
			        </div>
			        <div class="modal-footer">
			         
			        </div>
			      </div>
				</div>
			   </div>


		<!--end insert pop up-->

		<footer class="footer">
			<div class="container">
			
			</div>
		</footer>		
		
		 <script src="<?php echo base_url('asset/js/jquery.min.js') ?>"></script>
      	<script src="<?php echo base_url('asset/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('asset/js/angular.min.js') ?>"></script>
		<script src="<?php echo base_url('asset/js/app.js') ?>"></script>
		
	</body>
</html>