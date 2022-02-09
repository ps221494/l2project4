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
    public partial class AdminPanel : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

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
            set { _LstEmployee = value; OnPropertyChanged(); }
        }

        private ObservableCollection<pizzas> _ObcPizzas;

        public ObservableCollection<pizzas> ObsCPizza
        {
            get { return _ObcPizzas; }
            set { _ObcPizzas = value;}
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
                    LstvPizza.Visibility = Visibility.Hidden;
                    DGmedewerkers.Visibility = Visibility.Visible;
                    LSTEmployee.Clear();
                    foreach (Employee item in _db.GetEmployeeDetails())
                    {
                           LSTEmployee.Add(item);
                    }
                    DGmedewerkers.ItemsSource = LSTEmployee;
                    break;
                case "2":
                    //ObsCPizza.Clear();
                    LstvPizza.Visibility = Visibility.Visible;
                    DGmedewerkers.Visibility = Visibility.Hidden;
                    foreach (pizzas item in _db.SelectPizzas())
                    {
                        ObsCPizza.Add(item);
                    }
                    LstvPizza.ItemsSource = ObsCPizza;
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
        /*public void BtnVerwijder_click(object sender, RoutedEventArgs e)
        {
            DataRowView selectedroww = DGmedewerkers.SelectedItem as DataRowView;
            
            Employee deleteit = new Employee();
            switch (TXTtoshow.Text)
            {
                case "1":
                    if (!_db.DeleteEmployee(selectedroww["id"].ToString()))
                    {
                        MessageBox.Show("error met verwijderen");
                        
                    }
                    else
                    {
                        MessageBox.Show("verwijderd");
                        FillDG();
                        TXTtoshow.Text = "1";
                    }
                    break;
                case "2":
                    break;
            }
            
        }
        public void BtnWijzig_click(object sender, RoutedEventArgs e)
        {
            Employee employee = DGmedewerkers.SelectedItem as Employee;


            DataRowView selectedroww = DGmedewerkers.SelectedItem as DataRowView;
            EditEmployee edtScreen = new EditEmployee(selectedroww["id"].ToString());
            FillDG();
        }*/
        private void Logout(object sender, RoutedEventArgs e)
        {
            MainWindow loginscreen = new MainWindow();

            loginscreen.Show();
            this.Close();
        }

        private void selectEmpoley_Click(object sender, RoutedEventArgs e)
        {
            Employee employee = (Employee)DGmedewerkers.SelectedItem;
            EditEmployee editEmployee = new EditEmployee(employee);
            editEmployee.Show();

        }

        private void deleteEmpoley_Click(object sender, RoutedEventArgs e)
        {
            Employee employee = (Employee)DGmedewerkers.SelectedItem;
            if (employee != null)
            {
                _db.DeleteEmployee(employee.Id.ToString());
            }
            else
            {
                MessageBox.Show("Je hebt geen medewerker gekozen om te verwijderen");
            }
        }
    }
}
