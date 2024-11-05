document.getElementById('burgerMenu').addEventListener('click', function() {
  const sidebar = document.getElementById('sidebar');
  if (sidebar.style.display === 'block') {
    sidebar.style.display = 'none';
  } else {
    sidebar.style.display = 'block';
  }
});