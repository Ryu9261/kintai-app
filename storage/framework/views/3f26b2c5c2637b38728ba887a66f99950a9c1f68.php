        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">-->

        <!-- Styles -->
        <style>
            

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
    <p>スタッフ追加</p>
    <form action="/manager/staff/add" method="post">
        <table>
        <?php echo csrf_field(); ?>
        <tr>
            <th>
            氏名:
            </th>
            <td>
            <input type="text" name="name" value="">
            </td>
        </tr>
        <tr>
            <th>
            雇用形態:
            </th>
            <td>
            <input type="text" name="e_status" value="">
            </td>
        </tr>
        <tr>
            <th>
            時給（社員以外）:
            </th>
            <td>
            <input type="text" name="wage" value="">
            </td>
        </tr>
        <tr>
            <th>
            </th>
            <td>
            <input type="submit" value="send">
            </td>
        </tr>
        </table>
  </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\竜太朗\Desktop\kintai\resources\views/staffadd.blade.php ENDPATH**/ ?>