        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
<?php $__env->startSection('content'); ?>
<div class="content">
    

    <div class="links">
        <div class="col links">
            <a href="<?php echo e(url('/manager/staff')); ?>">スタッフ管理</a>
        </div>
        <div class="col links">
            <a href="<?php echo e(url('/manager/wage')); ?>">給与一覧</a>
        </div>
        <div class="col links">
            <a href="<?php echo e(url('/manager/timecardStaff')); ?>">タイムカード</a>
        </div>
                    
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\竜太朗\Desktop\kintai\resources\views/manager.blade.php ENDPATH**/ ?>