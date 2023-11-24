# Zad1
```php
<?php
// Dane do zapisania w bazie 
$username = "example_user"; 
$password = "tajneHaslo"; 
// Generowanie soli 
$salt = bin2hex(random_bytes(16)); 
// Haszowanie hasła z solą 
$hashedPassword = password_hash($password . $salt, PASSWORD_BCRYPT); 
// Przykładowy SQL do zapisania danych 
$sql = "INSERT INTO users (username, password, salt) VALUES (?, ?, ?)"; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("sss", $username, $hashedPassword, $salt); 
$stmt->execute(); 
echo "Dane zaszyfrowane zapisane do bazy."; 
// Zamknięcie połączenia z bazą danych 
$stmt->close(); 
$conn->close(); 
?>
```
# Zad2 
```php
<?php 
// Dane logowania z formularza (przykład) 
$inputUsername = "example_user"; 
$inputPassword = "tajneHaslo"; 
// Pobranie danych użytkownika z bazy danych 
$sql = "SELECT * FROM users WHERE username = ?"; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $inputUsername); 
$stmt->execute(); 
$result = $stmt->get_result(); 
if ($result->num_rows > 0) { 
    // Użytkownik istnieje, sprawdź hasło 
    $row = $result->fetch_assoc(); 
    $hashedPassword = $row['password']; 
    $salt = $row['salt']; 
    // Sprawdzenie hasła z użyciem funkcji password_verify 
    if (password_verify($inputPassword . $salt, $hashedPassword)) { 
        echo "Logowanie udane. Witaj, " . $inputUsername . "!"; 
    } else { 
        echo "Nieprawidłowe hasło."; 
    } 
} else { 
    echo "Nieprawidłowy użytkownik."; 
} 
// Zamknięcie połączenia z bazą danych 
$stmt->close(); 
$conn->close(); 
?> 
