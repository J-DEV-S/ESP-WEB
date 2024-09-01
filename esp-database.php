<?php
    // Database connection details
    $servername = "mysql-fc9df9a-jazzspotit-38f8.k.aivencloud.com";
    $dbname = "defaultdb";
    $username = "avnadmin";
    $password = "AVNS_Zgvc7vDq8kELlG98KiQ";
    $port = 23282; // Port number

    function createOutput($name, $board, $gpio, $state) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert output
        $sql = "INSERT INTO Outputs (name, board, gpio, state)
                VALUES ('" . $name . "', '" . $board . "', '" . $gpio . "', '" . $state . "')";

        // Execute query and return result
        if ($conn->query($sql) === TRUE) {
            return "New output created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    function deleteOutput($id) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to delete output
        $sql = "DELETE FROM Outputs WHERE id='" . $id . "'";

        // Execute query and return result
        if ($conn->query($sql) === TRUE) {
            return "Output deleted successfully";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    function updateOutput($id, $state) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to update output state
        $sql = "UPDATE Outputs SET state='" . $state . "' WHERE id='" . $id . "'";

        // Execute query and return result
        if ($conn->query($sql) === TRUE) {
            return "Output state updated successfully";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    function getAllOutputs() {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to get all outputs
        $sql = "SELECT id, name, board, gpio, state FROM Outputs ORDER BY board";

        // Execute query and return result
        if ($result = $conn->query($sql)) {
            return $result;
        } else {
            return false;
        }

        $conn->close();
    }

    function getAllOutputStates($board) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to get all output states for a specific board
        $sql = "SELECT gpio, state FROM Outputs WHERE board='" . $board . "'";

        // Execute query and return result
        if ($result = $conn->query($sql)) {
            return $result;
        } else {
            return false;
        }

        $conn->close();
    }

    function getOutputBoardById($id) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to get board by output ID
        $sql = "SELECT board FROM Outputs WHERE id='" . $id . "'";

        // Execute query and return result
        if ($result = $conn->query($sql)) {
            return $result;
        } else {
            return false;
        }

        $conn->close();
    }

    function updateLastBoardTime($board) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to update last request time for a board
        $sql = "UPDATE Boards SET last_request=now() WHERE board='" . $board . "'";

        // Execute query and return result
        if ($conn->query($sql) === TRUE) {
            return "Last request time updated successfully";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    function getAllBoards() {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to get all boards
        $sql = "SELECT board, last_request FROM Boards ORDER BY board";

        // Execute query and return result
        if ($result = $conn->query($sql)) {
            return $result;
        } else {
            return false;
        }

        $conn->close();
    }

    function getBoard($board) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to get specific board details
        $sql = "SELECT board, last_request FROM Boards WHERE board='" . $board . "'";

        // Execute query and return result
        if ($result = $conn->query($sql)) {
            return $result;
        } else {
            return false;
        }

        $conn->close();
    }

    function createBoard($board) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert new board
        $sql = "INSERT INTO Boards (board) VALUES ('" . $board . "')";

        // Execute query and return result
        if ($conn->query($sql) === TRUE) {
            return "New board created successfully";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    function deleteBoard($board) {
        global $servername, $username, $password, $dbname, $port;

        // Create connection with SSL mode enabled
        $conn = new mysqli($servername, $username, $password, $dbname, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to delete a board
        $sql = "DELETE FROM Boards WHERE board='" . $board . "'";

        // Execute query and return result
        if ($conn->query($sql) === TRUE) {
            return "Board deleted successfully";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
