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
    public partial class bereidingwindow : Window, INotifyPropertyChanged
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

        private pizzas _selectedOrderDetail;

        public pizzas SelectedOrderDetails
        {
            get { return _selectedOrderDetail; }
            set { _selectedOrderDetail = value; OnPropertyChanged(); }
        }




        private ObservableCollection<pizzas> _LstOrderDetails = new ObservableCollection<pizzas>();

        public ObservableCollection<pizzas> LstOrderDetails
        {
            get { return _LstOrderDetails; }
            set { _LstOrderDetails = value; OnPropertyChanged(); }
        }


        private pizzas _Selectedpizzaorder;

        public pizzas SelectedPizzaOrders
        {
            get { return _Selectedpizzaorder; }
            set { _Selectedpizzaorder = value; OnPropertyChanged(); }
        }
        private ObservableCollection<pizzas> _LSTorderPIZA = new ObservableCollection<pizzas>();

        public ObservableCollection<pizzas> LSTORDERPIZZA
        {
            get { return _LSTorderPIZA; }
            set { _LSTorderPIZA = value; OnPropertyChanged(); }
        }
        #endregion
        #region accepted order details

        private Order_details _SelectedAcceptedorder;
        public Order_details SelectedAcceptedOrder
        {
            get { return _SelectedAcceptedorder; }
            set { _SelectedAcceptedorder = value; OnPropertyChanged(); }
        }




        private ObservableCollection<pizzas> _LstAcceptedorders = new ObservableCollection<pizzas>();

        public ObservableCollection<pizzas> LstAcceptedOrders
        {
            get { return _LstAcceptedorders; }
            set { _LstAcceptedorders = value; OnPropertyChanged(); }
        }

        private pizzas _InOvenSelected;
        public pizzas SelectedInOverOrder
        {
            get { return _InOvenSelected; }
            set { _InOvenSelected = value; OnPropertyChanged(); }
        }
        private ObservableCollection<pizzas> _LstInOvenOrders = new ObservableCollection<pizzas>();

        public ObservableCollection<pizzas> LstInOvenOrders
        {
            get { return _LstInOvenOrders; }
            set { _LstInOvenOrders = value; OnPropertyChanged(); }
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
            PopulateOvenOrders();
        }

        private void PopulateOrders()
        {
            List<pizzas> OrderdetailsFromDb = _db.GetRecievedOrder_Details();

            if (OrderdetailsFromDb == null)
            {
                MessageBox.Show("error inladen orders");
            }
            else
            {
                LSTORDERPIZZA.Clear();
                foreach (pizzas order_Details in OrderdetailsFromDb)
                {
                    LSTORDERPIZZA.Add(order_Details);
                }
            }
        }

        private void PopulateAcceptedOrders()
        {
            List<pizzas> AccepterOrders = _db.GetAccepterOrders();

            if (AccepterOrders == null)
            {
                MessageBox.Show("error inladen orders");
            }
            else
            {
                LstAcceptedOrders.Clear();
                foreach (pizzas acceptedorders in AccepterOrders)
                {
                    LstAcceptedOrders.Add(acceptedorders);
                }
            }
        }

        private void PopulateOvenOrders()
        {
            List<pizzas> AccepterOrders = _db.GetInOvenOrders();

            if (AccepterOrders == null)
            {
                MessageBox.Show("error inladen orders");
            }
            else
            {
                LstAcceptedOrders.Clear();
                foreach (pizzas acceptedorders in AccepterOrders)
                {
                    LstInOvenOrders.Add(acceptedorders);
                }
            }
        }

        private void ListView_MouseDoubleClick(object sender, MouseButtonEventArgs e)
        {
            pizzas changedDetails = new pizzas()
            {
                Status = SelectedPizzaOrders.Status,
            };

            if ((MessageBox.Show("Bestelling accepteren?", "", MessageBoxButton.YesNo) == MessageBoxResult.No))
            {
                if ((MessageBox.Show("bestelling niet geaccepteerd" + " wilt u de bestelling annuleren?", "", MessageBoxButton.YesNo) == MessageBoxResult.Yes))
                {

                }
            }
            else
            {
                if (!_db.UpdateOrderStatus(SelectedPizzaOrders.Order_ID, changedDetails))
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
        private void ToOven_MouseDoubleClick(object sender, MouseButtonEventArgs e)
        {
            pizzas changedDetails = new pizzas()
            {
                Status = SelectedAcceptedOrder.Status,
            };

            if ((MessageBox.Show("Bestelling accepteren?", "", MessageBoxButton.YesNo) == MessageBoxResult.No))
            {
                if ((MessageBox.Show("bestelling niet geaccepteerd" + " wilt u de bestelling annuleren?", "", MessageBoxButton.YesNo) == MessageBoxResult.Yes))
                {

                }
            }
            else
            {
                if (!_db.UpdateToOvenOrderStatus(SelectedAcceptedOrder.Order_ID, changedDetails))
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
