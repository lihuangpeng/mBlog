import Vue from "vue"
import {
    Tabs,
    TabPane,
    Icon,
    Container,
    Row,
    Col,
    Card,
    Image,
    Loading,
    MessageBox,
    Message,
    Pagination,
    PageHeader,
    Upload,
    Dialog,
    Breadcrumb,
    BreadcrumbItem,
    Button,
    Form,
    FormItem,
    Input,
    Switch,
    Cascader,
    Select,
    Option,
    Skeleton,
    SkeletonItem
} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'element-ui/lib/theme-chalk/display.css';

Vue.use(Loading.directive);
Vue.use(Image);
Vue.use(Card);
Vue.use(Tabs);
Vue.use(TabPane);
Vue.use(Icon);
Vue.use(Container);
Vue.use(Col);
Vue.use(Row);
Vue.use(Pagination);
Vue.use(PageHeader);
Vue.use(Upload);
Vue.use(Dialog);
Vue.use(Breadcrumb);
Vue.use(BreadcrumbItem)
Vue.use(Button);
Vue.use(Form);
Vue.use(FormItem);
Vue.use(Input);
Vue.use(Switch);
Vue.use(Cascader);
Vue.use(Select);
Vue.use(Option);
Vue.use(Skeleton);
Vue.use(SkeletonItem);
Vue.prototype.$confirm = MessageBox.confirm;
Vue.prototype.$loading = Loading.service;
Vue.prototype.$message = Message;