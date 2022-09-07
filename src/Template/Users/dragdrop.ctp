<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserType[]|\Cake\Collection\CollectionInterface $userTypes
 */
?>

<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Cultural Change Admin';
?>
<html>

<style>
  .canvas-container {
    position: relative;
    width: 100% !important;
    height: 100% !important;
    box-shadow: 0 0 2px 1px black;
  }

  .canvas-container.over {
    border: 5px dashed #8080808c;
  }

  canvas {
    width: 100% !important;
    height: 100% !important;
  }

  #images img.img_dragging {
    opacity: 0.4;
  }

  /* 
Styles below based on  http://www.html5rocks.com/en/tutorials/dnd/basics/ 
*/

  /* Prevent the text contents of draggable elements from being selectable. */
  [draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    /* Required to make elements draggable in old WebKit */
    -khtml-user-drag: element;
    -webkit-user-drag: element;
    cursor: move;
  }

  .Content {
    height: 450px;
    overflow-y: scroll;
    overflow-x: hidden;
    width: -webkit-fill-available;
  }

  .Content::-webkit-scrollbar {
    width: 1em;
    height: 1em
  }

  ::-webkit-scrollbar-button {
    background: no-repeat #e9ecef;
    background-size: 0.75em;
    background-position: center bottom;
  }

  ::-webkit-scrollbar-button:vertical:decrement {
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='%235a6268'><polygon points='0,50 100,50 50,0'/></svg>");
  }

  ::-webkit-scrollbar-button:vertical:increment {
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='%235a6268'><polygon points='0,0 100,0 50,50'/></svg>");
  }

  ::-webkit-scrollbar-track-piece {
    background: #f8f9fa
  }

  ::-webkit-scrollbar-thumb {
    background: #cce5ff
  }
</style>

<head>
  <?php echo $this->Html->script('fabric.min'); ?>
  <?php echo $this->Html->script('lz-string.min'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>

<body>
  <div class="fullpage">
  <div class="section">
    <div class="canvas-container" data-floorplan="https://via.placeholder.com/500x200/448844/fff">
      <canvas></canvas>
    </div>
    <div class="furniture">
      <img draggable="true" src="https://via.placeholder.com/50x50/848/fff">
    </div>
  </div>
  <div class="section">
    <div class="canvas-container" data-floorplan="https://via.placeholder.com/500x200/448844/fff">
      <canvas></canvas>
    </div>
    <div class="furniture">
      <img draggable="true" src="https://via.placeholder.com/50x50/848/fff">
    </div>
  </div>
  <div class="section">
    <div class="canvas-container" data-floorplan="https://via.placeholder.com/500x200/448844/fff">
      <canvas></canvas>
    </div>
    <div class="furniture">
      <img draggable="true" src="https://via.placeholder.com/50x50/848/fff">
    </div>
  </div>
</div>

<script>
//   $('.fullpage').fullpage({
//     sectionsColor: ['pink', '#4BBFC3'],
// });

function initCanvas() {
    $('.canvas-container').each(function(index) {

        var canvasContainer = $(this)[0];
        var canvasObject = $("canvas", this)[0];
        var url = $(this).data('floorplan');
        var canvas = window._canvas = new fabric.Canvas(canvasObject);

        canvas.setHeight(200);
        canvas.setWidth(500);
        canvas.setBackgroundImage(url, canvas.renderAll.bind(canvas));
        
        var imageOffsetX, imageOffsetY;

        function handleDragStart(e) {
            [].forEach.call(images, function (img) {
                img.classList.remove('img_dragging');
            });
            this.classList.add('img_dragging');
          
          
            var imageOffset = $(this).offset();
            imageOffsetX = e.clientX - imageOffset.left;
            imageOffsetY = e.clientY - imageOffset.top;
        }

        function handleDragOver(e) {
            if (e.preventDefault) {
                e.preventDefault();
            }
            e.dataTransfer.dropEffect = 'copy';
            return false;
        }

        function handleDragEnter(e) {
            this.classList.add('over');
        }

        function handleDragLeave(e) {
            this.classList.remove('over');
        }

        function handleDrop(e) {
            e = e || window.event;
            if (e.preventDefault) {
              e.preventDefault();
            }
            if (e.stopPropagation) {
                e.stopPropagation();
            }
            var img = document.querySelector('.furniture img.img_dragging');
            console.log('event: ', e);
          
            var offset = $(canvasObject).offset();
            var y = e.clientY - (offset.top + imageOffsetY);
            var x = e.clientX - (offset.left + imageOffsetX);
          
            var newImage = new fabric.Image(img, {
                width: img.width,
                height: img.height,
                left: x,
                top: y
            });
            canvas.add(newImage);
            return false;
        }

        function handleDragEnd(e) {
            [].forEach.call(images, function (img) {
                img.classList.remove('img_dragging');
            });
        }
      
      var images = document.querySelectorAll('.furniture img');
      [].forEach.call(images, function (img) {
        img.addEventListener('dragstart', handleDragStart, false);
        img.addEventListener('dragend', handleDragEnd, false);
      });
      canvasContainer.addEventListener('dragenter', handleDragEnter, false);
      canvasContainer.addEventListener('dragover', handleDragOver, false);
      canvasContainer.addEventListener('dragleave', handleDragLeave, false);
      canvasContainer.addEventListener('drop', handleDrop, false);
    });
}
initCanvas();

  </script>
</body>