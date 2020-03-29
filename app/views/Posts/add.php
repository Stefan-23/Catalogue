<?php require APPROOT . '/views/inc/header.php';?>


        
    <div class="card card-body bg-light mt-5">
        <h2>Add post</h2>
            <p>Say something </p>
        <form action="<?php echo URLROOT; ?> posts/add" method="POST">
        <div class="form-group">
            <label for="title"> Title:  </label>
                <input type="text" name="title" class="form-control form control-lg <?php echo (!empty($data['err_title'])) ? 'is-invalid' : '' ; ?>" value = "<?php echo $data['title']; ?>"> 
                    <span class="invalid-feedback"> <?php echo $data['err_title']; ?> </span>
        </div>
        <div class="form-group">
            <label for="body"> Body:  </label>
                <textarea name="body" class="form-control form control-lg <?php echo (!empty($data['err_body'])) ? 'is-invalid' : '' ; ?>" value = "<?php echo $data['body']; ?>"> </textarea>
                    <span class="invalid-feedback"> <?php echo $data['err_body']; ?> </span>
        </div> 
        <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
        
    




<?php require APPROOT . '/views/inc/footer.php';?>