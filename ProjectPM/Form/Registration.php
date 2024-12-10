<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/style/registration.css" />
    <title>Register | Jail Jail</title>
  </head>
  <body>
    <div class="form-container">
      <h2>Registration Form</h2>
      <form action="../Backend/registerAuth.php" method="POST" enctype="multipart/form-data">
        <!-- Personal Information -->
        <input type="text" name="full_name" placeholder="Full Name" required />
        <input type="email" name="email" placeholder="Email" required />

        <!-- Address -->
        <input type="text" name="address" placeholder="Address" required />

        <!-- Detainee Information -->
        <input
          type="text"
          name="detainee_name"
          placeholder="Detainee's Full Name"
          required
        />
        <select name="relationship" required>
          <option value="" disabled selected>Relationship to Detainee</option>
          <option value="parent">Parent</option>
          <option value="spouse">Spouse</option>
          <option value="sibling">Sibling</option>
          <option value="other">Other</option>
        </select>

        <!-- Upload Documents -->
        <label for="user-id">Upload Valid ID:</label>
        <input type="file" id="user-id" name="image" accept=".jpg, .jpeg, .png" required />

        <!-- Submit -->
        <button type="submit" name="submit">Register</button>
      </form>

      <p>Already have an account? <a href="../index.php">Login</a></p>
    </div>
  </body>
</html>
