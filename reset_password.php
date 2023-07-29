<?php
// Start the session at the beginning of the file
session_start();

include 'header.php';
?>

<div class="wrapper row3">
    <main class="hoc container clear"> 
        <!-- main body -->
        <!-- ################################################################################################ -->
        <div id="comments">
            <h1 style="text-align: center; color: #896014">Change Password</h1>
            <div>
                <form name="ResetPasswordForm" action="reset_password.php" method="POST" style="text-align: center;">
                    <label for="old_password">Enter Old Password:</label>
                    <div style="position: relative;">
                        <input type="password" name="old_password" id="old_password" required>
                        <span style="position: absolute; top: 8px; right: 10px; cursor: pointer;" onclick="togglePasswordVisibility('old_password')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div><br>

                    <label for="new_password">Enter New Password (Do not add spaces):</label>
                    <div style="position: relative;">
                        <input type="password" name="new_password" id="new_password" required>
                        <span style="position: absolute; top: 8px; right: 10px; cursor: pointer;" onclick="togglePasswordVisibility('new_password')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div><br>

                    <label for="confirm_password">Re-enter New Password:</label>
                    <div style="position: relative;">
                        <input type="password" name="confirm_password" id="confirm_password" required>
                        <span style="position: absolute; top: 8px; right: 10px; cursor: pointer;" onclick="togglePasswordVisibility('confirm_password')">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div><br>

                    <input type="submit" name="submit" value="Change Password">
                </form>
                <?php
                // Database connection code (use your own database credentials)
                $db_name       = "VLE_DB";
                $servername    = "localhost";
                $username      = "root";
                $password      = "PaRthiB@2003_";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed : " . $conn->connect_error);
                    echo "Unable to connect";
                    exit();
                }

                // Continue with the rest of the password update logic...
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $oldPassword = isset($_POST["old_password"]) ? $_POST["old_password"] : "";
                    $newPassword = isset($_POST["new_password"]) ? $_POST["new_password"] : "";
                    $confirmPassword = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : "";

                    // Check if new password and confirm password match
                    if ($newPassword === $confirmPassword) {
                        // Get the current logged-in user ID from the session
                        $user_id = $_SESSION['id'];

                        // Fetch the user's current password from the database
                        $stmt = $conn->prepare("SELECT USER_PW FROM LOGIN_MASTER WHERE USER_ID = ?");
                        $stmt->bind_param("s", $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows == 1) {
                            $row = $result->fetch_assoc();
                            $currentPassword = $row["USER_PW"];

                            // Check if the old password matches the current password
                            if (password_verify($oldPassword, $currentPassword)) {
                                // Hash the new password before updating in the database
                                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                                // Update the user's password in the database
                                $stmt = $conn->prepare("UPDATE LOGIN_MASTER SET USER_PW = ? WHERE USER_ID = ?");
                                $stmt->bind_param("ss", $hashedPassword, $user_id);
                                if ($stmt->execute()) {
                                    // Password updated successfully
                                    echo "<p style='text-align:center;color:green;'>Password changed successfully.</p>";
                                } else {
                                    // Handle the error if the password update fails
                                    echo "<p style='text-align:center;color:red;'>Error updating password: " . $conn->error . "</p>";
                                }
                            } else {
                                echo "<p style='text-align:center;color:red;'>Old password does not match the current password.</p>";
                            }
                        } else {
                            echo "<p style='text-align:center;color:red;'>User with ID $user_id not found in the database.</p>";
                        }
                    } else {
                        echo "<p style='text-align:center;color:red;'>New password and confirm password do not match.</p>";
                    }
                }
                ?>
            </div>
        </div>
        <!-- ################################################################################################ -->
    </main>
</div>

<script>
    function togglePasswordVisibility(inputId) {
        var input = document.getElementById(inputId);
        var type = input.getAttribute('type');

        if (type === 'password') {
            input.setAttribute('type', 'text');
        } else {
            input.setAttribute('type', 'password');
        }
    }
</script>

<?php include 'footer.php'; ?>
