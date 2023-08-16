
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-12">
        
        <div>
            <h2>Editar Tarea</h2>
        </div>
        <div>
            <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-primary">Volver</a>
        </div>
    </div>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger mt-2">
        <strong>Se requiere llenar los campos!</strong> Algo fue mal..<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

    <form action="<?php echo e(route('tasks.update',$task)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Tarea:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Tarea" value="<?php echo e($task->title); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción..." ><?php echo e($task->descripcion); ?></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control" value=<?php echo e($task->due_date); ?> id=''> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado :</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="Pendiente" <?php if("Pendiente"==$task->status): echo 'selected'; endif; ?>>Pendiente</option>
                        <option value="En progreso" <?php if("En progreso"==$task->status): echo 'selected'; endif; ?>>En progreso</option>
                        <option value="Completada" <?php if("Completada"==$task->status): echo 'selected'; endif; ?>>Completada</option>
                       <!-- <option value="">-- Elige el status --</option>
                        <option value="Pendiente" <?php if($task->status == "Pendiente"): ?> selected <?php endif; ?> style="background-color: yellow;">Pendiente</option>
                        <option value="En progreso" <?php if($task->status == "En progreso"): ?> selected <?php endif; ?> style="background-color: orange;">En progreso</option>
                        <option value="Completada" <?php if($task->status == "Completada"): ?> selected <?php endif; ?> style="background-color: green;">Completada</option>-->
                    </select>
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\crud-laravel\resources\views/edit.blade.php ENDPATH**/ ?>