# Create Customer and Staff View Folders
If (!(Test-Path "resources/views/relatif/customer")) {
    New-Item -ItemType Directory -Path "resources/views/relatif/customer" -Force
}
If (!(Test-Path "resources/views/relatif/staff")) {
    New-Item -ItemType Directory -Path "resources/views/relatif/staff" -Force
}

# Move views
If (Test-Path "resources/views/relatif/menu.blade.php") {
    Move-Item -Path "resources/views/relatif/menu.blade.php" -Destination "resources/views/relatif/customer/menu.blade.php" -Force
    Write-Host "Moved menu.blade.php"
}
If (Test-Path "resources/views/relatif/cart.blade.php") {
    Move-Item -Path "resources/views/relatif/cart.blade.php" -Destination "resources/views/relatif/customer/cart.blade.php" -Force
    Write-Host "Moved cart.blade.php"
}
If (Test-Path "resources/views/relatif/payment.blade.php") {
    Move-Item -Path "resources/views/relatif/payment.blade.php" -Destination "resources/views/relatif/customer/payment.blade.php" -Force
    Write-Host "Moved payment.blade.php"
}
If (Test-Path "resources/views/relatif/orders.blade.php") {
    Move-Item -Path "resources/views/relatif/orders.blade.php" -Destination "resources/views/relatif/customer/orders.blade.php" -Force
    Write-Host "Moved orders.blade.php"
}
If (Test-Path "resources/views/relatif/login.blade.php") {
    Move-Item -Path "resources/views/relatif/login.blade.php" -Destination "resources/views/relatif/staff/login.blade.php" -Force
    Write-Host "Moved login.blade.php"
}
