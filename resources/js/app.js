import './bootstrap';

window.addEventListener('livewire:navigated', (event) => {
   Livewire.dispatch('reloadSlick');
});
