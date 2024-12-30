<div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let notifications = @json($notifications);

            notifications.forEach(notification => {
                let postLink = document.createElement("a");
                postLink.href = `/Javzine/post/${notification.post_id}`;
                postLink.innerHTML = notification.body || 'No content';
                postLink.style.color = "#fff";
                postLink.style.textDecoration = "none";

                let toast = Toastify({
                    node: postLink,
                    duration: 0,
                    close: true,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: "linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(0,212,255,1) 100%, rgba(1,111,151,1) 100%)",
                    },
                });

                toast.showToast();

                setTimeout(() => {
                    const closeButton = toast.toastElement.querySelector(".toast-close");
                    if (closeButton) {
                        closeButton.addEventListener("click", () => {
                            console.log(
                                `Close button clicked for notification ID: ${notification.id}`
                                );
                            Livewire.dispatch('markNotificationAsRead', { id: notification.id });
                        });
                    }
                }, 100);
            });
        });
    </script>
</div>
