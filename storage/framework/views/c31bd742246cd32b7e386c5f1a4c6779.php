

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">CRUD de Tareas</h2>
        </div>
        <div>
            <a href="<?php echo e(route('tasks.create', $tasks)); ?>" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    <?php if(Session::get('success')): ?>
    <div class="alert alert-success mt-2">
        <strong><?php echo e(Session::get('success')); ?></strong><br>
    </div>
    <?php endif; ?>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Tarea</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="fw-bold"><?php echo e($task->title); ?></td>
                <td><?php echo e($task->descripcion); ?></td>
                <td>
                    <?php echo e($task->due_date); ?>

                </td>
               <!-- <td>
                <span class="badge bg warning fs-6"><?php echo e($task->status); ?></span>
                </td>-->
                
                <td class="<?php if($task->status == 'Pendiente'): ?> bg-warning text-yeloww <?php elseif($task->status == 'En progreso'): ?>
                            bg-info text-white <?php else: ?> bg-success text-white <?php endif; ?>">
                    
                   <?php echo e($task->status); ?>

                   
                    
                </td>

               <!-- <td class="<?php if($task->status == 'Pendiente'): ?> bg-warning text-dark <?php elseif($task->status == 'En progreso'): ?> bg-info text-white <?php else: ?> bg-success text-white <?php endif; ?>">
    

    <?php echo e($task->status); ?>

</td-->

                <td>
                    <a href="<?php echo e(route('tasks.edit', $task)); ?>" class="btn btn-warning">Editar</a>

                    <form id= "delete-form" action="<?php echo e(route('tasks.destroy', $task)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">Eliminar</button>
                    </form>
                </td>
                <script>
                    function confirmDelete(event) 
                    {
                        event.preventDefault();
                            if (confirm('¿Estás seguro de que deseas eliminar esta tarea?')) 
                            {
                                document.getElementById('delete-form').submit();
                            }
                    }
            </script>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <?php echo e($tasks->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crud-laravel\resources\views/index.blade.php ENDPATH**/ ?>