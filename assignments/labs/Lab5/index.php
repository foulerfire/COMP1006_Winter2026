<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>

<h2>Upload Profile Picture</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="profileImage">
    <button type="submit">Upload</button>
</form>

</body>
</html>

<!-- Refelection Questions

1. The $_FILES superglobal is used to store information about files that are uploaded using a form. It allows PHP to look at details such as file type, file name, file size, and its location. This information is needed to move the uploaded file to a permanent spot on the server.

2. A form needs special settings to upload a file properly because, without them, the browser will not encode the data in a way that PHP can read.

3. The function used to move uploaded files to a folder is move_uploaded_file(), which takes the temporary location and moves it to a specific folder on the server.
4. It’s important to control where uploaded files are stored to keep the project secure and organized. Using a specific folder helps prevent files from being placed in an insecure location and makes it easier to access and manage the files later.

--> 

