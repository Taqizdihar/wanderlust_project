<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="pengelolaWisata/cssWisata/addWisata.css?v=1.0.4">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=MuseoModerno|Concert One">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include "pengelolaWisata/viewsWisata.php";?>
    <div class="main">
        <form method="post" enctype="multipart/form-data">
            <table border="0">
                <tr>
                    <td>Full Name</td>
                    <td>:</td>
                    <td><input name="fullname" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input name="email" required></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><input name="phone" required></td>
                </tr>
                <tr>
                    <td valign="top">Address</td>
                    <td valign="top">:</td>
                    <td><textarea name="address" rows="3" cols="60" required></textarea></td>
                </tr>
                <tr>
                    <td valign="top">Tax Document</td>
                    <td valign="top">:</td>
                    <td><input type="file" name="npwp" accept="image/*, .doc, .docx, .pdf" required></td>
                </tr>
                <tr>
                    <td valign="top">Legal Business Document</td>
                    <td valign="top">:</td>
                    <td><input type="file" name="nib" accept="image/*, .doc, .docx, .pdf" required></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Save" name="save">
                        <input type="reset" value="Reset" onclick="return confirm('Reset Form?')>
                    </td>
                </tr>
            </table>
            <br><br>
        </form>
    </div>
</body>
</html>