<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/contato.css')); ?>">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

<div class="container">
  <h1>FALE CONOSCO</h1>
    
  <?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>

  
  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul style="margin:0; padding-left:18px">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>


  <form method="POST" action="<?php echo e(route('contatos.store')); ?>">
    <?php echo csrf_field(); ?>

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="<?php echo e(old('nome')); ?>"
      required />

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"
      required />

    <label for="mensagem">Mensagem</label>
    <textarea id="mensagem" name="mensagem" required><?php echo e(old('mensagem')); ?></textarea>

    <button type="submit" class="btn-enviar">ENVIAR</button>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\gisel\Desktop\DS-Etec\3-MODULO\PW3\codeflix-site\resources\views/contato.blade.php ENDPATH**/ ?>