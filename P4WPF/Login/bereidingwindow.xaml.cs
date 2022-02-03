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
    /// Interaction logic for bereidingwindow.xaml
    /// </summary>
    public partial class bereidingwindow : Window , INotifyPropertyChanged
    {
        #region PropertyChanged
        public event PropertyChangedEventHandler PropertyChanged;
        // Create the OnPropertyChanged method to raise the event
        // The calling member's Name will be used as the parameter.
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }
        #endregion


        private ProjectDB _db = new ProjectDB();
        #region order details

        private Order_details _selectedOrderDetail;

        public Order_details SelectedOrderDetails
        {
            get { return _selectedOrderDetail; }
            set { _selectedOrderDetail = value; OnPropertyChanged(); }
        }


       

        private ObservableCollection<Order_details> _LstOrderDetails = new ObservableCollection<Order_details>();

        public ObservableCollection<Order_details> LstOrderDetails
        {
            get { return _LstOrderDetails; }
            set { _LstOrderDetails = value; OnPropertyChanged(); }
        }
        #endregion
        #region accepted order details

        private Order_details _SelectedAcceptedorder;
        public Order_details SelectedAcceptedOrder
        {
            get { return _SelectedAcceptedorder; }
            set { _SelectedAcceptedorder = value; OnPropertyChanged(); }
        }


       

        private ObservableCollection<Order_details> _LstAcceptedorders = new ObservableCollection<Order_details>();

        public ObservableCollection<Order_details> LstAcceptedOrders
        {
            get { return _LstAcceptedorders; }
            set { _LstAcceptedorders = value; OnPropertyChanged(); }
        }
        #endregion


        public bereidingwindow()
        {
            InitializeComponent();
            RepopulateOrders();
            DataContext = this;
        }

        private void RepopulateOrders()
        {
            PopulateOrders();
            PopulateAcceptedOrders();
        }

        private void PopulateOrders()
        {
            List<Order_details> OrderdetailsFromDb = _db.GetRecievedOrder_Details();

            if (OrderdetailsFromDb == null)
            {
                MessageBox.Show("error inladen orders");
            }
            else
            {
                LstOrderDetails.Clear();
                foreach (Order_details order_Details in OrderdetailsFromDb)
                {
                    LstOrderDetails.Add(order_Details);
                }
            }
        }

        private void PopulateAcceptedOrders()
        {
            List<Order_details> AccepterOrders = _db.GetAccepterOrders();

            if (AccepterOrders == null)
            {
                MessageBox.Show("error inladen orders");
            }
            else
            {
                LstAcceptedOrders.Clear();
                foreach (Order_details acceptedorders in AccepterOrders)
                {
                    LstAcceptedOrders.Add(acceptedorders);
                }
            }
        }

        private void ListView_MouseDoubleClick(object sender, MouseButtonEventArgs e)
        {
            Order_details changedDetails = new Order_details()
            {
                Status = SelectedOrderDetails.Status,
            };

            if ((MessageBox.Show("Bestelling accepteren?", "", MessageBoxButton.YesNo) == MessageBoxResult.No))
            {
                if ((MessageBox.Show("bestelling niet geaccepteerd" + "Wilt u de bestelling annuleren?","", MessageBoxButton.YesNo) == MessageBoxResult.Yes))
                {
                    
                }  
            }
            else
            {
                if (!_db.UpdateOrderStatus(SelectedOrderDetails.Order_ID, changedDetails))
                {
                    MessageBox.Show("er is een fout bij het wijzigen");
                }
                else
                {
                    MessageBox.Show("bestelling geaccepteerd");
                }
            }
            RepopulateOrders();
        }

        private void Logout(object sender, RoutedEventArgs e)
        {
            MainWindow loginscreen = new MainWindow();

            loginscreen.Show();
            this.Close();
        }
    }
}
