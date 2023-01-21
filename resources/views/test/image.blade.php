<form method="POST" action="/test/upload" enctype="multipart/form-data">
  @csrf
  <input type="file" name="image">
  <button>アップロード</button>
</form>