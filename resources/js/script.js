document.addEventListener('DOMContentLoaded', () => {
  const filterButtons = document.querySelectorAll('.category-btn');
  const products = document.querySelectorAll('.product-card');

  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const cat = btn.dataset.category;
      products.forEach(p => {
        p.style.display = (cat === 'all' || p.dataset.category === cat) ? 'block' : 'none';
      });
    });
  });
});
