<?php
    require_once 'header.php'
?>

    <div class="container">
        <h2>ToDo List </h2>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Task
        </button>
        <table class="table table-bordered" id="myTable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Task</th>
                <th class="no-sort">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($data as $item) {
                    ?>
                    <tr data-id="<?=$item['id']?>">
                        <td><?=$item['author']?></td>
                        <td><?=$item['email']?></td>
                        <td <?=$admin==true ? 'contenteditable class="description"' : ''?>><?=$item['description']?></td>
                        <td><input type="checkbox" <?=$item['status']=='completed' ? 'checked' : ''?> <?=$admin==true ? 'class="status"' : 'disabled'?>></td>
                    </tr>
                    <?php
                }
                    ?>
            </tbody>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/add" class="col-md-10 offset-md-1" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" max="100">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" max="100">
                                </div>
                                <div class="form-group">
                                    <label>Description:</label>
                                    <input type="text" class="form-control" placeholder="Description" name="desc">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once 'footer.php';