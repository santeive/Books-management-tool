<div class="row" style="margin-top:20px;">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Create Book Shelf</div>
            <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)" id="frm-add-book-shelf">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_name">Name:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Enter Book Shelf Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_capacity">Capacity:</label>
                        <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" name="txt_capacity" id="txt_capacity" placeholder="Enter capacity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_location">Shelf Location:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_location" name="txt_location" placeholder="Enter location">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="dd_status">Status:</label>
                        <div class="col-sm-10">
                        <select name="dd_status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>