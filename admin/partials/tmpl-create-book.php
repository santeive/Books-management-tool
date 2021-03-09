<div class="row" style="margin-top:20px;">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Create Book</div>
            <div class="panel-body">
                <form class="form-horizontal" action="/action_page.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_name">Name:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_email">Email:</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" name="txt_email" id="txt_email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_publication">Publication:</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="txt_publication" placeholder="Enter publication">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_description">Description:</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="txt_description" name="txt_description" placeholder="Enter description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_image">Book Image:</label>
                        <div class="col-sm-10">
                        <input type="file" class="form-control" id="txt_image" name="txt_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="txt_cost">Book Cost:</label>
                        <div class="col-sm-10">
                        <input type="number" min="1" class="form-control" id="txt_cost" name="txt_cost" placeholder="Enter Book Cost">
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