<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Services</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
    <h2>Add New Service</h2>
    <form action="<?= site_url('admin/addService'); ?>" method="post">
        <label>Service Name:</label>
        <input type="text" name="service_name" required><br><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br><br>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required><br><br>

        <button type="submit">Add Service</button>
    </form>
</body>
</html>
