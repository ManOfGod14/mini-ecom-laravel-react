import { toast } from "react-toastify";

// to top right notify
export function notifyToTopRight(type, content) {
    switch (type) {
        case 'info' : 
            toast.info(content, {
                postion: toast.POSITION.TOP_RIGHT
            });
            break;

        case 'success' : 
            toast.success(content, {
                postion: toast.POSITION.TOP_RIGHT
            });
            break;

        case 'error' : 
            toast.error(content, {
                postion: toast.POSITION.TOP_RIGHT
            });
            break;
        
        default : 
            toast(content, {
                postion: toast.POSITION.TOP_RIGHT
            })
    }
}