<?php
session_start();

// Sample user data (in a real app, this would come from a database)
$users = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
    ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User'],
    ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'role' => 'User'],
];

// Get current user from session or default
$currentUser = isset($_SESSION['user']) ? $_SESSION['user'] : $users[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
            padding: 40px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }
        
        .header p {
            color: #666;
            font-size: 14px;
        }
        
        .profile-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            border-left: 4px solid #667eea;
        }
        
        .profile-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .profile-item:last-child {
            border-bottom: none;
        }
        
        .profile-label {
            font-weight: 600;
            color: #333;
            min-width: 120px;
        }
        
        .profile-value {
            color: #666;
        }
        
        .users-section {
            margin-top: 30px;
        }
        
        .users-section h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 20px;
        }
        
        .user-card {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 12px;
            border-left: 3px solid #667eea;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .user-card:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
        }
        
        .user-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .user-name {
            font-weight: 600;
            color: #333;
            font-size: 16px;
        }
        
        .user-role {
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .user-email {
            color: #666;
            font-size: 14px;
            margin-top: 8px;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            justify-content: center;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-secondary {
            background: #e0e0e0;
            color: #333;
        }
        
        .btn-secondary:hover {
            background: #d0d0d0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>User Profile</h1>
            <p>Manage and view user information</p>
        </div>
        
        <!-- Current User Profile -->
        <div class="profile-section">
            <div class="profile-item">
                <span class="profile-label">Name:</span>
                <span class="profile-value"><?php echo htmlspecialchars($currentUser['name']); ?></span>
            </div>
            <div class="profile-item">
                <span class="profile-label">Email:</span>
                <span class="profile-value"><?php echo htmlspecialchars($currentUser['email']); ?></span>
            </div>
            <div class="profile-item">
                <span class="profile-label">Role:</span>
                <span class="profile-value"><?php echo htmlspecialchars($currentUser['role']); ?></span>
            </div>
            <div class="profile-item">
                <span class="profile-label">User ID:</span>
                <span class="profile-value"><?php echo htmlspecialchars($currentUser['id']); ?></span>
            </div>
        </div>
        
        <!-- All Users List -->
        <div class="users-section">
            <h2>All Users</h2>
            <?php foreach ($users as $user): ?>
                <div class="user-card">
                    <div class="user-card-header">
                        <div>
                            <div class="user-name"><?php echo htmlspecialchars($user['name']); ?></div>
                            <div class="user-email"><?php echo htmlspecialchars($user['email']); ?></div>
                        </div>
                        <div class="user-role"><?php echo htmlspecialchars($user['role']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn btn-primary">Edit Profile</button>
            <button class="btn btn-secondary">Back to Home</button>
        </div>
    </div>
</body>
</html>
