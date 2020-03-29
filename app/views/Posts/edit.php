<?php require APPROOT . '/views/inc/header.php';?>


        
    <div class="card card-body bg-light mt-5">
        <h2>Edit post</h2>
            <p>Edit this product</p>
        <form action="<?php echo URLROOT; ?> posts/edit/<?php echo $data['id']; ?>" method="POST">
        <div class="form-group">
            <label for="title"> Title:  </label>
                <input type="text" name="title" class="form-control form control-lg <?php echo (!empty($data['err_title'])) ? 'is-invalid' : '' ; ?>" value = "<?php echo $data['title']; ?>"> 
                    <span class="invalid-feedback"> <?php echo $data['err_title']; ?> </span>
        </div>
        <div class="form-group">
        <label for="body">Body: </label>
            <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <?php if($_SESSION['user_id'] == 10) : ?>
        <div class="form-group">
        <label for="approved">Approved: </label>
            <textarea name="approved" class="form-control form-control-lg <?php echo (!empty($data['err_approved'])) ? 'is-invalid' : ''; ?>"><?php echo $data['approved']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['err_approved']; ?></span>
        </div>
        <?php endif; ?>
            <input type="submit" class="btn btn-success" value="Edit">
        </form>
    </div>
        
    




<?php require APPROOT . '/views/inc/footer.php';?>