<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    if (isset($_POST['decision'])) { 
        $decision = $_POST['decision']; 
 
        // Save the decision to a file 
        $file = 'decision.txt'; 
        if (file_put_contents($file, $decision)) { 
            echo "✅ Decision recorded: " . htmlspecialchars($decision); 
        } else { 
            echo "❌ Failed to write to file."; 
        } 
    } else { 
        echo "❌ No decision received."; 
    } 
} else { 
    echo "❌ Invalid request method."; 
} 
?>
