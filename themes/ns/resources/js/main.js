import initPagination from './blog-pagination';
import updateUserVisit from './user';

initPagination();

updateUserVisit(window.location.href);