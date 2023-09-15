
<!-- <h2><?php// print_r($data) ?></h2> -->
<div class="row">
    <div class="col-12">
        <form action="post">
            <div class="form-group">
                <select name="state" id="stateId" class="form-control mb-5">
                    <option value="" disabled selected>Select State</option>
                    <?php 
                        $cnt=1; $results=$data;
                        if($results <> "" && $results <> 1){foreach($results as $result){   ?>

                        <option value="<?php echo $result->state_id ; ?>"> <?php echo $result->state_name  ;?></option>

                        <?php $cnt=$cnt+1;}} ?>
                </select>
            </div>

            <div class="form-group">
                <select name="lga" id="lgaId" class="form-control mb-5">
                    <option value="" disabled selected>Select LGA</option>
                </select> 
            </div>
           

        </form>
        <div class="card">
            <div class="card-header with-border d-flex align-items-center justify-content-between">
              <h4 class="card-title" id="pollName"> Polling Unit</h4>
              <div class="d-flex align-items-center justify-content-end">

               <!-- <a  href="add-book" class="ml-3 btn btn-success btn-sm btn-rounded text-white" data-target="modal">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New Book
              </a> -->

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
				<div class="table-responsive">
				  <table id="example1" class="table table-sm table-bordered table-striped">
					<thead class="bg-primary text-white">
						<tr>
							<th>#</th>
			                <th>Unit No. </th>
                            <th>Polling Unit Name</th>
                            <th>Description</th>
                            <th>Entered By</th>
			                <th>Date Added</th>
                           <th>Action</th>
			            </tr>
					</thead>
					<tbody>
					
                                <!-- <td>value</td> -->
                                <!-- <td>gdg</td> -->
						
					</tbody>
					</table>
				</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
</div>

