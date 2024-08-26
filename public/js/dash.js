// script.js
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('a.tab');
    const contents = document.querySelectorAll('.content');
  
    tabs.forEach(tab => {
      tab.addEventListener('click', function(event) {
        event.preventDefault();
  
        // إزالة الفئة النشطة من جميع العناصر
        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.style.display = 'none');
  
        // إضافة الفئة النشطة للعنصر المحدد
        this.classList.add('active');
  
        // عرض المحتوى المرتبط بالعنصر
        const targetId = this.getAttribute('data-target');
        document.getElementById(targetId).style.display = 'block';
      });
    });
  });
  