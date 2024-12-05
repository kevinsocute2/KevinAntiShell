<?php
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý bài viết</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .form-container textarea,
        .form-container input[type="text"] {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #34495e;
        }
        .message {
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Quản lý bài viết</h1>
    <div class="form-container">
        <form method="POST" action="">
            <label for="title">Tiêu đề bài viết:</label>
            <input type="text" name="title" id="title" placeholder="Nhập tiêu đề bài viết" required>

            <label for="headline">Tiêu đề chính:</label>
            <input type="text" name="headline" id="headline" placeholder="Nhập tiêu đề chính" required>

            <label for="keywords">Từ khóa:</label>
            <input type="text" name="keywords" id="keywords" placeholder="Nhập từ khóa, cách nhau bởi dấu phẩy" required>

            <label for="description">Mô tả:</label>
            <input type="text" name="description" id="description" placeholder="Nhập mô tả bài viết" required>

            <label for="author">Tên tác giả:</label>
            <input type="text" name="author" id="author" placeholder="Nhập tên tác giả" required>

            <label for="publisher">Tên nhà xuất bản:</label>
            <input type="text" name="publisher" id="publisher" placeholder="Nhập tên nhà xuất bản" required>

            <label for="mainEntity">URL của bài viết:</label>
            <input type="text" name="mainEntity" id="mainEntity" placeholder="Nhập URL chính" required>

            <label for="content">Nội dung bài viết (HTML):</label>
            <textarea name="content" id="content" rows="10" placeholder="Nhập nội dung bài viết dạng HTML" required></textarea>

            <button type="submit" name="submit">Lưu bài viết</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $headline = htmlspecialchars($_POST['headline']);
            $keywords = htmlspecialchars($_POST['keywords']);
            $description = htmlspecialchars($_POST['description']);
            $author = htmlspecialchars($_POST['author']);
            $publisher = htmlspecialchars($_POST['publisher']);
            $mainEntity = htmlspecialchars($_POST['mainEntity']);
            $content = $_POST['content'];

            // Lấy ngày tháng năm hiện tại
            $datePublished = date('Y-m-d');
            $dateModified = date('Y-m-d');

            // Kiểm tra thư mục "story"
            $directory = "story";
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }

            // Tạo tên file ngẫu nhiên
            $filename = $directory . '/' . uniqid('story_', true) . '.html';

            // Nội dung HTML
            $htmlContent = <<<HTML
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>$title</title>
    <meta name="description" content="$description">
    <meta name="keywords" content="$keywords">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/x-icon" href="https://github.com/kevinsocute2/kevinsocute2/blob/main/xd%20logo%202.png?raw=true">
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "headline": "$headline",
          "description": "$description",
          "author": {
            "@type": "Person",
            "name": "$author"
          },
          "publisher": {
            "@type": "Organization",
            "name": "$publisher",
            "logo": {
              "@type": "ImageObject",
              "url": "https://github.com/kevinsocute2/kevinsocute2/blob/main/xd%20logo%202.png?raw=true"
            }
          },
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "$mainEntity"
          },
          "datePublished": "$datePublished",
          "dateModified": "$dateModified"
        }
    </script>
    <style>
      body {
          font-family: Arial, sans-serif;
          line-height: 1.6;
          margin: 20px;
          padding: 0;
          background-color: #f4f4f4;
      }
      h1, h2 {
          color: #2c3e50;
      }
      p {
          text-align: justify;
      }
      .content {
          background-color: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }
      .highlight {
          color: #e74c3c;
      }
  </style>
</head>

<body>
    <div class="content">
        $content
    </div>
</body>

</html>
HTML;

            // Lưu file
            if (file_put_contents($filename, $htmlContent)) {
                echo "<div class='message'>Tải thành công! File được lưu tại: <a href='$filename' target='_blank'>$filename</a></div>";
            } else {
                echo "<div class='message'>Đã xảy ra lỗi khi lưu file.</div>";
            }
        }
        ?>
    </div>
</body>

</html>
