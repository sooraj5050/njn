<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
.icon-container {
    display: inline-block;
    position: relative;
  }

  .icon-container:hover .hover-shade {
    display: block;
  }

  .hover-shade {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    display: none;
  }

  .rotate-down {
    transform:scaleY(-1);
    transition: transform 0.3s ease;
  }

</style>
</head>
<body>
    <div class="icon-container">
        <svg id="icon" width="18px" height="18px" viewBox="0 0 48 48" focusable="false" fill="currentColor" class="a-s-fa-Ha-pa c-qd">
          <path fill="none" d="M0 0h48v48H0V0z"></path>
          <path d="M8 24l2.83 2.83L22 15.66V40h4V15.66l11.17 11.17L40 24 24 8 8 24z"></path>
        </svg>
        <div class="hover-shade"></div>
      </div>
      <script>
        const icon = document.getElementById('icon');
        const iconContainer = document.querySelector('.icon-container');

        iconContainer.addEventListener('click', function() {
          icon.classList.toggle('rotate-down');
        });
      </script>
</body>
</html>

