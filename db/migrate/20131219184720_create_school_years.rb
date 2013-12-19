class CreateSchoolYears < ActiveRecord::Migration
  def change
    create_table :school_years do |t|
      t.integer :year

      t.timestamps
    end
    add_index :school_years, :year, unique: true
  end
end
