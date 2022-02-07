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
using System.Data;


namespace Login
{
    /// <summary>
    /// Interaction logic for AdminPanel.xaml
    /// </summary>
    public partial class AdminPanel : Window
    {
        ProjectDB _db = new ProjectDB();

        private Employee _selectedDelete;
        public Employee ToDelete
        {
            get { return _selectedDelete; }
            set { _selectedDelete = value;}
        }
        private ObservableCollection<Employee> _LstEmployee = new ObservableCollection<Employee>();

        public ObservableCollection<Employee> LSTEmployee
        {
            get { return _LstEmployee; }
            set { _LstEmployee = value;}
        }
        public AdminPanel()
        {
            InitializeComponent();
            FillDG();
        }
        private void FillDG()
        {
            switch (TXTtoshow.Text)
            {
                case "1":
                    DataTable MedewerkersTable = _db.SelectMedewerkers();
                    if (MedewerkersTable != null)
                    {
                        DGmedewerkers.ItemsSource = MedewerkersTable.DefaultView;
                    }
                    break;
                case "2":
                    DataTable PizzaTable = _db.SelectPizzas();
                    if (PizzaTable != null)
                    {
                        DGmedewerkers.ItemsSource = PizzaTable.DefaultView;
                    }
                    break;
            }

           

        }

        private void BtnShowMW(object sender, RoutedEventArgs e)
        {
            TXTtoshow.Text = "1";
            FillDG();
        }

        private void BtnShowPizza(object sender, RoutedEventArgs e)
        {
            TXTtoshow.Text = "2";
            FillDG();
        }

        private void AddPizza(object sender, RoutedEventArgs e)
        {
            NewPizzaWin pizzawin = new NewPizzaWin();
            pizzawin.Show();
        }
        private void AddItem(object sender, RoutedEventArgs e)
        {
            AddItems itemwin = new AddItems();
            itemwin.Show();
        }
        public void BtnVerwijder_click(object sender, RoutedEventArgs e)
        {
            
            Employee deleteit = new Employee();
            switch (TXTtoshow.Text)
            {
                case "1":
                    if (!_db.DeleteEmployee(deleteit, deleteit))
                    {

                    }
                    break;
                case "2":
                    break;
            }
            FillDG();
        }
        public void BtnWijzig_click(object sender, RoutedEventArgs e)
        {

            FillDG();
        }
        private void Logout(object sender, RoutedEventArgs e)
        {
            MainWindow loginscreen = new MainWindow();

            loginscreen.Show();
            this.Close();
        }
    }
}
