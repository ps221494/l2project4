using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using Login.Models;
using System.Runtime.CompilerServices;
using System.Collections.ObjectModel;
using System.ComponentModel;

namespace Login
{
    /// <summary>
    /// Interaction logic for bezorgwindow.xaml
    /// </summary>
    public partial class bezorgwindow : Window
    {
        public event PropertyChangedEventHandler PropertyChanged;
        // Create the OnPropertyChanged method to raise the event
        // The calling member's Name will be used as the parameter.
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }
        private ProjectDB _db = new ProjectDB();

        private pizzas _SelectedToDelivery;
        public pizzas SelectedToDelivery
        {
            get { return _SelectedToDelivery; }
            set { _SelectedToDelivery = value; OnPropertyChanged(); }
        }
        private ObservableCollection<pizzas> _LstToDelivery = new ObservableCollection<pizzas>();

        public ObservableCollection<pizzas> LstToDelivery
        {
            get { return _LstToDelivery; }
            set { _LstToDelivery = value; OnPropertyChanged(); }
        }
        public bezorgwindow()
        {
            InitializeComponent();
            PopulateToDeliver();
            DataContext = this;
        }

        private void PopulateToDeliver()
        {
            List<pizzas> OrderdetailsFromDb = _db.GetDeliveryOrders();

            if (OrderdetailsFromDb == null)
            {
                MessageBox.Show("error inladen orders");
            }
            else
            {
                LstToDelivery.Clear();
                foreach (pizzas DeliveryDetails in OrderdetailsFromDb)
                {
                    LstToDelivery.Add(DeliveryDetails);
                }
            }
        }

        private void Logout(object sender, RoutedEventArgs e)
        {
            MainWindow loginscreen = new MainWindow();

            loginscreen.Show();
            this.Close();
        }

        private void ListView_MouseDoubleClick(object sender, MouseButtonEventArgs e)
        {

        }
    }
}
