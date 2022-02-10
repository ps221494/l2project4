using Login.Models;
using System.Collections.ObjectModel;
using System.ComponentModel;
using System.Runtime.CompilerServices;
using System.Windows;

namespace Login
{
    /// <summary>
    /// Interaction logic for NewPizzaWin.xaml
    /// </summary>
    public partial class NewPizzaWin : Window, INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler PropertyChanged;
        protected void OnPropertyChanged([CallerMemberName] string name = null)
        {
            PropertyChanged?.Invoke(this, new PropertyChangedEventArgs(name));
        }

        private ObservableCollection<Ingredient> obsIngredientList = new ObservableCollection<Ingredient>();

        private ObservableCollection<Ingredient> InGredients
        {
            get { return obsIngredientList; }
            set { obsIngredientList = value; OnPropertyChanged(); }
        }

        private Ingredient selectedIngredient;

        public Ingredient SelectedIngredient
        {
            get { return selectedIngredient; }
            set { selectedIngredient = value; }
        }


        ProjectDB _db = new ProjectDB();

        public NewPizzaWin()
        {

            InitializeComponent();
            DataContext = this;
            PopulateIngredient();

        }

        public void PopulateIngredient()
        {
            InGredients.Clear();
            foreach (Ingredient item in _db.GetAllIngredients())
            {
                InGredients.Add(item);
            }
            cmbIngredient1.ItemsSource = InGredients;
            cmbIngredient2.ItemsSource = InGredients;
            cmbIngredient3.ItemsSource = InGredients;
            cmbIngredient4.ItemsSource = InGredients;
            cmbIngredient5.ItemsSource = InGredients;

        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            MessageBox.Show("Ingredient: " + SelectedIngredient.Name );
        }
    }
}
