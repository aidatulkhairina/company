<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('content') ?>

            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $title; ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Product Category
                            </div>

                            <div class="card-body">
                                    <button type="button" class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" 
                                    data-bs-target="#addModal">
                                    <i class="fas fa-plus"></i>Add
                                    </button>

                                    <!-- noty add category -->
                                    <?php if(session('success')){ ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session('success'); ?>
                                        </div>
                                    <?php } ?>
                                    
                                
                                    <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th>Created at</th>
                                            <th>Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach($daftar_kategori as $kategori) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $kategori->nama_kategori; ?></td>
                                                <td><?= date('d/m/Y H:i:s', strtotime($kategori->created_at)); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" 
                                                    data-bs-target="#editModal<?= $kategori->id_kategori; ?>">
                                                        <i class="fas fa-edit"></i>Edit
                                                    </button>
                                                    <button href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal<?= $kategori->id_kategori; ?>">
                                                        <i class="fas fa-trash-alt"></i>Delete
                                                </button>
                                                </td>
                                            </tr>

                                            <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                            </div>
                        </div>
                        </div>
                </main>

                <!-- Modal Add -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-plus"></i>Add Product Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('daftar-kategori/tambah') ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="mb-3">
                                    <label for="nama_kategori">Category Name</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <?php foreach($daftar_kategori as $kategori){ ?>
                <div class="modal fade" id="editModal<?= $kategori->id_kategori; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-plus"></i>Edit Product Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('daftar-kategori/edit/'.$kategori->id_kategori) ?>" method="post">
                                <?= csrf_field(); ?>

                                <div class="mb-3">
                                    <label for="nama_kategori">Category Name</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori ?>" required>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <!-- Modal Delete -->
                <?php foreach($daftar_kategori as $kategori){ ?>
                <div class="modal fade" id="deleteModal<?= $kategori->id_kategori; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-trash-alt"></i>Delete Product Category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('daftar-kategori/delete/'.$kategori->id_kategori) ?>" method="post">
                                <?= csrf_field(); ?>
<!-- 
                                <input type="hidden" name="_DELETE" > -->

                                <p>Do you want to delete <b><?= $kategori->nama_kategori; ?></b> category?</p>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
                <?php } ?>


<?= $this->endSection(); ?>